# My Beaucuz Full Stack Project
___________

### Team Members:

- **Ayoube** 
- **Guillaume** 
- **Matei**
- **Wassim** 

Wecome ***Kelian*** and/or ***Emily*** to my masterpiece! :bowtie:

Please find the **My.Beaucuz project link** [here] ().


### Reason for this project:
________

For this project we were put in teams of 4, and asked to use all of our new PHP skills to use, as well as everything we have learned in front end development (HTML, CSS and JS). This is the first fill stack project we completed.

Another reason for this project was to familiarise ourselves with MySQL and the SQL language. We should learn how to CRUD (create, read, update and delete) data in a mysql database.

My.Beaucuz is a working prototype for the new cooking bootcamp of the Paul Bocuse Academy ("In Beaucuz we trust"), a 7-months intensive cooking training with some of the best chefs around the world.



## What did we do:

One of the things we had to do for this project was to create student and chef accounts. Depending whether you are a chef or a student you will see different things on the webiste and have different privileges.

There were many aspects to this project which we can firstly break down into front-end and back-end tasks.



*Front-end:*
-------

The front-end half of our team tackled the creation of the landing page, logging in page, and the content of the users profile once they successfully log in. Once logging in, the student can see a table of all the previous recipes himself or any other student has recorded for previous or even future days. There can only be one recipe registered for any day. 

Furthermore, the student is able to open up a new modal which allows them to add a recipe. Below this, the student can see a list of all their checkin and checkout times for previous days. The student can only see their own checkin and checkout times, not other students'. 

Each user has a profile section modal where they can see their first name, last name and email address. 

The user also has an option to log out of the account, and land back on the logging in page. 

All pages of our website are also resposive to different screen sizes, making it easily accessible and pleasant for the eye to see.


*Back-end:*
------

The back-end team worked on linking a PHPMyAdmin database consisting of 3 tables to our website, and figured out how to create, read, delete and modify data in our database, directly from the PHP website by connecting our PHP to the database via SQL. 

When entering the log in page, the user can either log in with an existing account or click on create new account, where the user sends the new account details into our database, and they are then able to log in using these new details. 

Another use of the website created from the back-end team was the clocking in and out system. This enabled the student to prove their presence for any given day, using a checkin and checkout button. Each button would record the date and time when clicked, respectively. This data would be added to our database table, as well as a table slightly further down on the website, where the student is able to see their previous checkin and checkout times for days that have past. The student is only able to see their own checkin and checkout times, and they cannot checkin or checkout more than once per day. 

Additionally, the student can add view a table of all the recipes recorded by him or by any of the other students. There can only be one recipe added per day. This is done by sending the new recipe addition data to our database table in PHPMyAdmin, and then presenting this new data in a table on the webiste. 

***Important!*** There is also the option to log into our webiste as a chef. Chefs do not have to checkin and checkout as students do, and additionally, they can see the checkin and checkout history of any student of their choice.

### What did we learn from this experience:

This project taught us many things, but most importantly, it taught us teamwork. We had daily meetings at the start and end of the day to discuss what everyone's tasks will be for the day. We managed to break down this project into trackable tasks for everyone to complete. This teamwork is also apparent when we consider that two people worked on the aspect of our website, while the other two people worked on the functionality and integration of MySQL with the website. Linking the two sections together was chanllenging at times, especially when merging branches on GitHub, but we powered through it an got a better taste of what a real life group project looks like. We will all be better equipped to work in teams in the future. 

Furthermore, we learned how personalisable and how many possibilities there are with integrating a database into our website. We can create, read, update and delete data from the database directly on PHPMyAdmin, in the PHP website code and also as a user, directly on the website! 

Also, we learned how to carry out a password hash, and why it is so important to do, as an additional security measure!

It should be mentioned that this project also refreshed some concepts we have already learned in HTML, CSS and Javascript, by creating a beautiful and responsive website. 

## Problems encountered:

We learned what a shitshow Github can be when we do what should be a 1 person project. Since we were multiple people working on the same file and the same task (such as creating and styling the menu page), it creates a lot of conflicts, some that we could only resolve using the command line. This is because we all started with the same common html, css and js files, and later some of us renamed the files, hoping to avoid any conficts. Oh the irony...

We also did not manage to make a functional shopping basket. We tried using the bulma modal preset on the last day of the project, but unsuccessfully. 

We are having soe troubles with making the search bar work. If you search for something on the search bar, it will return the food that matches your input text, but the layout of the page will change and the background image cuts abruptly before the end of the page, which we have not figured out how to fix.
-----

During the first couple of days, there havent been any major problems. The occassional long time spent trying to figure out how to request the correct data from MySQL and how/where to add it for clarity.

Within day 3 of the project, we attempted merging branches on github, but after merging the back-end and the front-end branches, the CSS was not responding properly on all the screens, depending on who's screen we were streaming the website from at the time.

Apart from this, certaing MySQL tasks and connecting the back-end functionality of the website to the right buttons and tables took some more time than expected. This is due to not having previous experience in such a complex project before, and not finding the right track to follow right away.

In general, there were substantially fewer problems than all of us expected, as experienced in previous group projects. This is something to be proud of! Woop woop! :fire: :trollface: :tada:


### Conclusion
_____

We created My.Beaucuz, a functional, integrated, full-stack prototype for the new cooking bootcamp.

Thank you for reading this readme and giving us feedback on the project :punch: 


[^1]:Fair use disclaimer, this website is for educational purpose only.

