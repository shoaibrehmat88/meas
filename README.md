# ITRoadway-test

## Introduction
Hello there potential ITRoadway developers. The App that you will be building will be a very simple ToDo application, with a focus on seeing how you handle technologies you probably never used before.

We would also like to see how you work together in a team, so while there will be distinct tasks for both frontend and backend, some tasks will be shared ones where you can coordinate between yourselves about who will do which part.

This whole test is of an open ended nature, so in case some things are not clearly defined, it will be up to you to make the decision and explain your choice about going that route on the interview. Of course, you can still feel free to contact us about any potential clarifications about the tasks listed.

<br/>

## Summary
The idea of the app that a user can register/login to the App and is able to create new notes and to update/delete previous notes. Notes themselves are simple entity which has a title, description and timestamps. 

<br/>

## Shared
- Setup a Laravel application in such a way that the Vue.js part will act as a SPA (single page application) and the Laravel part as a RESTful API
- Users should only be able to perform CRUD operations on their own ToDos

<br>

## Frontend
- There will be 6 screens in total: welcome screen (for guest users), login, register, ToDos list, create new ToDo, view/update ToDo
- Once the user is logged in, they should stay logged in (even if the page is refreshed) using the existing token
- Logout button in navigation which will logout the user
- There are no designs provided, and you will have to make the screens as you see fit
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