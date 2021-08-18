## User-App

Routes:

CreateUser[POST] 127.0.0.1:8000/api/user ==> example request {"first_name": "Gaurav","last_name": "Singhal"}

GetAllUsers[GET] 127.0.0.1:8000/api/user

GetUserById[GET] 127.0.0.1:8000/api/user/:id

UpdateUser[PUT] 127.0.0.1:8000/api/user/:id

DeleteUser[DELETE] 127.0.0.1:8000/api/user/:id


Use API Key in Postman for authorisation

Key : token
Value: my-secret-token
