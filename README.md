# swiggysparks
Repository for Swiggy hackathon where we have implemented a real time dashboard to take actions

## Inspiration
Swiggy wanted us to implement a solution on their data related problems. So we have decided to implement a system that gives real time actionable dashboard. 

## What it does
We have consumed the swiggy order data set provided by them and we have added our own logic on top of it to simulate events in real time and showing the data in the dashboard. 

This figures out the anomolies like,

-- The delay in order placed time - the time taken for the order to reach the restaurant display\n
-- The delay in order placed time - the time taken for the fleet guy to accept the particular delivery\n
-- More insights into order cancellations
-- Misc alerts for the team and customers

## How we built it
with data coming from multiple sources like consumer app, partner app, delivery fleet app we need to send it to pipeline using kafka and take actions in real time with the help of apache storm while we use postgres for DB operations especially to handle geospatial queries. 

## Challenges we ran into
data integrity issues

## Accomplishments that we're proud of
We have a complete product to show the demo

## What we learned
building scalable system in real time

## What's next for Spark Alerts for Swiggy
Need to check with swiggy team on it. We 

