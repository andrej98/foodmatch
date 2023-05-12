<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Restaurant;
use App\Model\Like;
use App\Model\Rating;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class RestaurantController extends Controller
{
    public function showOne()
    {
        $user = auth()->user();
        $preference = $user->preferences;

        //algorithm to show the restaurant based on users preferences
        // $restaurant = Restaurant::inRandomOrder()->first();

        $client = new Client();

        $response = $client->request('GET', 'http://localhost:8001/recommendation/'.$user->id);

        $body = $response->getBody();

        $data = json_decode($body, true);

        $count = 0;
        foreach($data as $restaurantId) {
            $restaurant = Restaurant::find($restaurantId);

            if($user->likes()->where('restaurant_id', $restaurant->id)->exists()) {
                $count++;
            } else {
                break;
            }
        }

        $noData = 0;
        if($count >= count($data)){
            $noData = 1;
        }

        $averageRating = $restaurant->ratings()->avg('rating');

        return view('restaurants.showOne', compact('restaurant', 'averageRating', 'noData'));
    }

    public function reject(Restaurant $restaurant)
    {
        $user = auth()->user();
        if(!$user->likes()->where('restaurant_id', $restaurant->id)->exists()) {
            $user->likes()->create([
                'restaurant_id' => $restaurant->id,
                'liked' => false
            ]);
        }
        return redirect()->route('restaurants.showOne');
    }

    public function like(Restaurant $restaurant)
    {
        $user = auth()->user();
        if(!$user->likes()->where('restaurant_id', $restaurant->id)->exists()) {
            $user->likes()->create([
                'restaurant_id' => $restaurant->id,
                'liked' => true
            ]);

            $usersGroups = $user->groups;
            $matchedGroups = [];
            foreach($usersGroups as $group) {
                $members = $group->users;

                // Get the likes for the restaurant
                $likes = $restaurant->likes;

                // Check if all members of the group have liked the restaurant
                if ($members->count() >= 2 && $members->every(function ($member) use ($likes) {
                    return $likes->contains('user_id', $member->id) && $likes->firstWhere('user_id', $member->id)->liked;
                })) {

                    if (!$group->restaurants->contains('id', $restaurant->id)) {
                        // Create a new match between the group and restaurant
                        $group->restaurants()->attach($restaurant->id);

                        // Show the success message
                        $matchedGroups[] = $group->name;

                    }

                }
            }
            if(count($matchedGroups) == 0 ) {
                return redirect()->route('restaurants.showOne');
            } else{
                $matchedGroups = implode(", ", $matchedGroups);
                return view('restaurants.matched', compact('matchedGroups'));
            }

        } else {
            return redirect()->route('restaurants.showOne');

        }
    }

    public function read(Restaurant $restaurant)
    {
        $user = auth()->user();
        $averageRating = $restaurant->ratings()->avg('rating');
        $rated = $user->ratings()->where('restaurant_id', $restaurant->id)->exists();
        return view('restaurants.read', compact('restaurant', 'rated', 'averageRating'));
    }

    public function review(Restaurant $restaurant)
    {
        return view('restaurants.review', compact('restaurant'));
    }

    public function submitReview(Restaurant $restaurant, Request $request)
    {
        $user = auth()->user();
        $rating = $user->ratings()->where('restaurant_id', $restaurant->id)->first();
        if ($rating) {
            // User has already rated this restaurant
            return redirect()->back()->withErrors('You have already rated this restaurant.');
        } else {
            // Create a new rating
            $rating = new Rating();
            $rating->user_id = $user->id;
            $rating->restaurant_id = $restaurant->id;
            $rating->rating = $request->input('rating');
            $rating->save();
            session()->flash('success', 'Thank you for rating this restaurant.');
            $averageRating = $restaurant->ratings()->avg('rating');

            return view('restaurants.read', compact('restaurant', 'averageRating'));
        }
    }

}
