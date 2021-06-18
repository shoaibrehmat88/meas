# Potential developers

## Introduction
Hello there Potential developer,

The App that you will be building will be a very simple ToDo application, the purpose of which is for you to showcase your coding skills using technologies you have experience of. Clean, good quality, well-structured code is the priority for this assessment which meets the criteria listed below.

This whole test is of an open ended nature, so in case some things are not clearly defined, it will be up to you to make the decision and explain your choice about going that route on the interview. Of course, you can still feel free to contact us about any potential clarifications about the tasks listed.

We are recruiting for 3 roles: 


	
- <b>Full stack developer</b> - must complete both <b>backend</b> and <b>frontend</b> tasks;
- <b>Backend developer</b> - must complete the <b>backend</b> task;
- <b>Frontend developer</b> - must complete the <b>frontend</b> task.

<br/>

## Summary
It is a requirement of the role that you are a confident English speaker. If you feel your language skills may be an issue please advise so we can assess before you complete this task.

The idea of the app that a user can register/login to the App and is able to create new notes and to update/delete previous ToDos. ToDos themselves are simple entity which has a title, description and timestamps. 

<br/>

## Fullstack
- Setup a Laravel application in such a way that the Vue.js part will act as a SPA (single page application) and the Laravel part as a RESTful API
- Users should only be able to perform CRUD operations only on their own ToDos
- Please complete both sections: "Frontend" and "Backend"

<br>

## Frontend

You are free to use any css framework or UI library that you want.
You can use any external APIs you can find for ToDos as endpoints.

- There will be 6 screens in total: welcome screen (for guest users), login, register, ToDos list, create new ToDo, view/update ToDo
- Once the user is logged in, they should stay logged in (even if the page is refreshed) using the existing token
- Logout button in navigation which will logout the user
- Designs will not form part of the assessment so please focus on good quality code rather than screen presentation
- <b>Welcome screen</b>:  will only be visible if a user is not logged in and is on route '/'
- <b> Register screen </b>: 
<br>only accessible to guest users (not logged in)
<br>only 2 fields are required - namely email and password
<br>upon successful registration; the user will be notified to check their email inbox and redirected to the login screen
- <b> Login screen </b>: 
<br> only accessible to guest users 
<br> 2 fields - email and password 
<br> if credentials are wrong the user should be notified 
<br> if credentials are correct the user should be logged in and redirected to '/' (which is now the list of my ToDos screen)
- <b> ToDo list </b>:
<br> only accessible for logged in users
<br> the user should see a list of their previously created ToDos
<br> the user should be able to go to the "Create new ToDo" screen from this one
<br> the user should be able to go to the "View/update ToDo" screen by selecting one of the ToDos from the list
<br> the user should be able to delete a particular ToDo from the list
<br> ToDos should be searchable by title
<br> Pagination should be handled in an "infinite scroll" kind of way
- <b> Create ToDo screen </b>: 
<br> only accessible for logged in users
<br> 2 fields: title and description of the ToDo
<br> upon successfully creating the ToDo the user should be redirected to the "ToDo list" screen
- <b> View/update ToDo screen </b>: 
<br> only accessible for logged in users
<br> 2 fields: title and description of the ToDo, and these fields should be pre filled with data from the server about this particular ToDo 
<br> upon successfully updating the ToDo the user should be redirected to the "ToDo list" screen

<br>

## Backend
- Creating the exact models needed for the application to work properly is completely up to you
- Database used should be MySQL
- <b> Register route </b>:
<br> required email and password
<br> route should create a user that is not verified in the database
<br> route should send a verification email to the users email
- <b> Verification route </b>:
<br> if the verification code is found in the database, the user should now be verified
- <b> Login route </b>: 
<br> check if email and password are correct and that the user is verified, otherwise reject
<br> if user is verified and email/password are correct, respond with a JWT token
- <b> Logout route </b>:
<br> invalidate the user's JWT token 
- <b> ToDo list route </b>:
<br> only accessible for logged in users
<br> send out a paginated list of ToDos (up to 10 items per page, preferably use Laravel's built in pagination)
<br> the list should be searchable by name (work together with the frontend to figure out the best way to get the search text)
- <b> Create ToDo route </b>: 
<br> only accessible for logged in users
<br> 2 fields required: title and description of the ToDo
<br> on success save the item to the database
- <b> View ToDo route </b>: 
<br> only accessible for logged in users
<br> respond with an object containing the title and description of the requested ToDo
- <b> Update ToDo route </b>: 
<br> only accessible for logged in users
<br> 2 fields required: title and description of the ToDo
<br> on success save updated item to the database
- <b> Delete ToDo route </b>: 
<br> only accessible for logged in users
<br> on success delete the item from the database

## Closing tips
- Since the app is simple by nature, the focus will be on covering all use cases, sending out appropriate responses / notifying the user properly, and clean code