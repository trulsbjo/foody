foody - a class project
=====

Team members: Truls Hamborg, Sindre Nygård, Nitharshaan Thevarajah.

Foody is a blog which contains recipes for cheap and easy prepared food.
As of now, Foody has 8 different recipes that users are welcome to comment
on. Foody also has an index and an about page.


Technologies
----

* HTML5
* CSS3
* XML
* PHP
* JavaScript
* Google reCAPTCHA

We have used HTML5 and CSS3 to build and display the content of the site
to the reader in a nice way. CSS3 also made the site responsive so the
content fits nicely on smaller monile screens as well as bigger desktop
screens.
All the comments are stored in XMLsheets, one sheet for each recipe.
The form on the website submits the comment to a PHP script using a POST
request. This PHP script then validates the submission and the reCAPTCHA
and write the comment to the correct XMLsheet. If the reCAPTCHA validation
should fail, it returns to the form with a GET attribute saying that
reCAPTCHA validation failed. A javascript looks for this attribute and
informs the user.
A javascript reads and parses the XMLsheet corresponding to the current
recipe being viewed. The javascript then makes the comments into HTML dom
objects that are appended to the comments-cnt object in the HTML file.
We have also used the Google reCAPTCHA framework in our project to avoid
spambots taking over. This was done with a PHP implementation. This is the
only library we have used.
