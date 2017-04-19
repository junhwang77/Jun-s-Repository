#Email Validation Features

1. Build a database (see `emails_db.sql`)[X]
 + Draw an ERD diagram [X]
 + Forward engineer that diagram [X]
 + Host our database via MAMP [X]
2. Build a server (Flask) [X]
    + Routing [X]
      + `/` (GET) -- welcome page [X]
      + `/` (POST) -- send email info [X]
      + `/success` (GET) -- display all the emails [X]
      + `/<id>` (POST) -- delete an email [X]
    + DB connection [X]
    + Regular expression to match an email pattern [X]
    + Implement flash messaging [X]
3. Front-end
  + Templates
    + `index.html` (form to collect an email, show flash messages) [X]
    + `success.html` (display all emails, form to delete) [X]
