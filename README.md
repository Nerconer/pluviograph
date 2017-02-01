# pluviograph
This bachelor's thesis was focused on the design and construction from scratch of a high-precision
electronic pluviograph for the Fabra Observatory, in Barcelona. 

What is a pluviograph?
----------------------

It's an instrument for measuring the amount of water that has fallen (i.e. a rain gauge), with a feature to register the data in real time to demonstrate rainfall over a short period of time.

How is it used?
---------------

This recording rain gauges will be used for the analysis of the atmospheric precipitations recording continuously the
rain, the accumulated total amount and duration of rainfall. 

How can I visualize data?
-------------------------

All this data gathered is be send to a web server and then stored into a database. This information shall be visualized
as an interactive graphic using HighCharts library.

![alt tag](http://i.imgur.com/xxHlHkf.png)

How does this pluviograph look like?
------------------------------------

In order to test de implementation, a simple prototype was created

![alt tag](http://i.imgur.com/1aoP67O.png)

Installation
------------
```
git clone https://github.com/Nerconer/pluviograph.git
```
Configuration
-------------

Modify settings inside `initialize()` methods.
