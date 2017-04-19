-- All the countries that speak Slovene: name of country, language, and language percentage(order in desc)
SELECT countries.name, languages.language, round(languages.percentage, 1)
FROM countries JOIN languages ON countries.id = languages.country_id 
WHERE languages.language = 'Slovene'
ORDER BY languages.percentage DESC;
-- The total number of cities for each country: name of country, total number of cities(order in desc)
SELECT countries.name, count(*)
FROM countries JOIN cities ON countries.id = cities.country_id
GROUP BY countries.id
ORDER BY count(*) DESC;
-- All the cities in Mexico with a population > 500,000. order by population in desc order
SELECT cities.name, cities.population
FROM cities JOIN countries ON countries.id = cities.country_id
WHERE countries.name = 'Mexico' AND cities.population > 500000;
-- All the language in each country with a percentage greater than 89%. order by percant in desc
SELECT countries.name, languages.language, languages.percentage
FROM countries JOIN languages ON countries.id = languages.country_id
WHERE languages.percentage > 89
ORDER BY languages.percentage DESC;
-- All the countries with surface area < 501 and population > 100,000
SELECT countries.name, countries.surface_area, countries.population
FROM countries
WHERE countries.surface_area < 501 AND countries.population > 100000;
-- All the cities of Argentina, Buenos Aires district, with population > 500000. Show Country name, city name, district and populations
SELECT countries.name, cities.name, cities.district, cities.population
FROM countries JOIN cities ON countries.id = cities.country_id
WHERE cities.district = 'Buenos Aires' AND cities.population > 500000;
-- To summarize the number of countries in each region. display name and number of countries (order by desc number of countries)
SELECT countries.region, count(*) as countries
FROM countries
GROUP BY countries.region
ORDER BY count(*) DESC;
