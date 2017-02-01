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

![highcharts_pluviograph](http://i.imgur.com/xxHlHkf.png)

How does this pluviograph look like?
------------------------------------

In order to test de implementation, a simple prototype of the rainwater collector equipment was created

![prototype_screenshot](http://i.imgur.com/1aoP67O.png)

Components & connection diagram
-------------------------------

### Components

List of the components used for the rainwater collector equipment:
- Arduino Mega
- High precision scales x2
- RS-232 to TTL converver x2
- Servomotor x2
- ESP8266-ESP01
- External power supply (5V)

### Connection diagram

![connection_diagram](http://i.imgur.com/8O29Hsx.png)

Installation
------------

```
git clone https://github.com/Nerconer/pluviograph.git
```
Configuration
-------------

Modify settings inside `initialize()` methods.
