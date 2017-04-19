SELECT tweets.tweet AS Kobe_tweets
FROM users
LEFT JOIN tweets ON users.id = tweets.user_id
WHERE users.id = 1;
-- all the tweets that user id 2 has picked as fave
SELECT first_name, tweet
FROM users
JOIN faves ON users.id = faves.user_id
JOIN tweets ON faves.tweet_id = tweets.id
WHERE users.id = 2;
-- query to get all the tweets that user with id 2, or user with id 1, has tagged as favorites?
SELECT first_name, tweet
FROM users
LEFT JOIN faves ON users.id = faves.user_id
LEFT JOIN tweets ON faves.tweet_id = tweets.id
WHERE users.id = 1 OR users.id = 2;
-- Query to get all the users that are following the user with id 1
SELECT users.first_name AS followed, users2.first_name AS follower
FROM users
LEFT JOIN follows
ON users.id = follows.followed_id
LEFT JOIN users AS users2
ON users2.id = follows.follower_id
WHERE users.id = 1;
-- Query to get all users that are not following the user with id of 2
SELECT *
FROM users
WHERE users.id NOT IN (
SELECT follower_id
FROM follows
WHERE followed_id = 2
) AND users.id != 2;