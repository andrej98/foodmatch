1) To start the installation you have to install anaconda.

## The next commands must to be on the anaconda prompt:
2) After you need to create the enviroment of enviroment.yml:
conda env create -f enviroment.yml

3) To start the execution of the project you have to activate the environment
conda activate progi
4) Then you have to change the directory in the anaconda prompt with cd.
5) Then you have to execute the manage.py with the port 8001
python manage.py runserver 8001

Then you have the API listening in the route localhost:8001. We created the route of /recommendation/id_user and will 
return the best restaurant for the user.

It returns a Python dictionary. 