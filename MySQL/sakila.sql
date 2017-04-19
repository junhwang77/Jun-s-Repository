-- 1.to get all the customers inside city_id = 312. return first last email and address
SELECT city.city_id, city.city, customer.first_name, customer.last_name, customer.email, address.address
FROM city
JOIN address ON city.city_id = address.city_id JOIN customer ON address.address_id = customer.address_id
WHERE city.city_id = 312;

-- 2. get all comedy films. return film title, description, release year, rating, special features, and genre
SELECT film.film_id, film.title, film.description, film.release_year, film.rating, film.special_features, category.name
FROM film
JOIN film_category ON film.film_id = film_category.film_id 
JOIN category ON film_category.category_id = category.category_id
WHERE category.name = 'Comedy';

-- 3. get all the films with actor_id =5. return film title, description, and release year
SELECT actor.actor_id, concat(actor.first_name, ' ', actor.last_name) AS actor_name, film.film_id, film.title, film.description, film.release_year
FROM actor
JOIN film_actor ON actor.actor_id = film_actor.actor_id 
JOIN film ON film_actor.film_id = film.film_id
WHERE actor.actor_id = 5;

-- 4. get all the customers in store_id=1, inside cities (1, 42, 312 and 459). return customer first name, last name, email, and address.
SELECT store.store_id, city.city_id, customer.first_name, customer.last_name, customer.email, address.address
FROM store
JOIN customer ON customer.store_id = store.store_id 
JOIN address ON customer.address_id = address.address_id
JOIN city ON address.city_id = city.city_id
WHERE store.store_id = 1 AND city.city_id IN (1, 42, 312, 459);

-- 5. get all the films with a rating = G, special feature = behind the scenes, with acotor id=15. film title, description, release year, rate, and special features
SELECT film.title, film.description, film.release_year, film.rating, film.special_features
FROM film
JOIN film_actor ON film.film_id = film_actor.film_id
JOIN actor ON film_actor.actor_id = actor.actor_id
WHERE film.rating = 'G' AND film.special_features like '%Behind the Scenes%' AND actor.actor_id = 15;

-- 6. get all the actors that joined in the film_id =369. return film id, title, actor id, actor name
SELECT film.film_id, film.title, actor.actor_id, concat(actor.first_name, ' ', actor.last_name) AS actor_name
FROM film
JOIN film_actor ON film.film_id = film_actor.film_id
JOIN actor ON film_actor.actor_id = actor.actor_id
WHERE film.film_id = 369;

-- 7. get all the drama films with a rental rate 2.99. return film_id, title, description, release year, rating, special features, genre, rental rate
SELECT film.film_id, film.title, film.description, film.release_year, film.rating, film.special_features, category.name, film.rental_rate
FROM film
JOIN film_category ON film.film_id = film_category.film_id
JOIN category ON film_category.category_id = category.category_id
WHERE film.rental_rate = 2.99 AND category.name = 'Drama';

-- 8. get all the action films with sandra kilmer. return actor_id, acotr_name, film_id, title, description, release_year, rating, special_features, genre
SELECT actor.actor_id, concat(actor.first_name, ' ', actor.last_name), film.film_id, film.title, film.description, film.release_year, film.rating, film.special_features, category.name
FROM actor
JOIN film_actor ON actor.actor_id = film_actor.actor_id
JOIN film ON film_actor.film_id = film.film_id
JOIN film_category ON film.film_id = film_category.film_id
JOIN category ON film_category.category_id = category.category_id
WHERE concat(actor.first_name, ' ', actor.last_name) = 'SANDRA KILMER' AND category.name = 'Action';












