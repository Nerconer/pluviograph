/*
 * Author: David Solà Solé (david.sola.sole@gmail.com)
 * Year: 2017 
 */
 
#include <Arduino.h>
#include "WifiController.h"

#define DEBUG true

WifiController::WifiController() {}

void WifiController::initialize() 
{
  Serial1.begin(115200);
  Serial.begin(115200);
  delay(500);

  this->_pathGet = "/projecte/receiver.php"; // Your receiver script
  this->_port = "80"; // Your port Host

  this->_ssid = "MOVISTAR_EXAMPLE";      // Your SSID
  this->_host = "192.168.1.40";          // Your host IP
  this->_pass = "AwgiDxXw67Htg3ZtxSv0";  // Your pass
  
  sendData("AT+RST\r\n", 2000, DEBUG);      // reset module
  sendData("AT+CWMODE=3\r\n", 2000, DEBUG); // configure as access point
  sendData("AT+CWJAP=\"" + getSsid() + "\",\"" + getPass() + "\"\r\n", 10000, DEBUG); 
  sendData("AT+CIFSR\r\n", 5000, DEBUG);   // get ip address
  sendData("AT+CIPMUX=1\r\n", 1000, DEBUG); // configure for multiple connections
}

void WifiController::sendRequest(String data)
{
  // Empty buffer
  while(Serial.available() > 0) {
    char t = Serial.read();
  }
  
  sendData("AT+CIPSTART=0,\"TCP\",\"" + getHost() + "\",80\r\n", 1000, DEBUG);
  sendData("AT+CIPSEND=0,88\r\n", 5000, DEBUG);
  sendData("GET " + getPathGet() + "?data=" + data + " HTTP/1.0\r\nHost: " + getHost() + "\r\n\r\n", 5000, DEBUG);
  sendData("AT+CIPCLOSE=0", 1000, DEBUG);
  sendData("AT+CIPSTART=0,\"TCP\",\"" + getHost() + "\",80\r\n", 5000, DEBUG);
}

String WifiController::getPathGet() 
{
  return _pathGet;
}

String WifiController::getHost()
{
  return this->_host;
}

String WifiController::getPort() 
{
  return this->_port;  
}

String WifiController::getSsid()
{
  return this->_ssid;
}

String WifiController::getPass()
{
  return this->_pass;
}

String WifiController::sendData(String command, const int timeout, boolean debug)
{
  String response = "";

  Serial1.print(command); // send the read character to the esp8266

  long int time = millis();

  while ( (time + timeout) > millis())
  {
    while (Serial1.available())
    {

      // The esp has data so display its output to the serial window
      char c = Serial1.read(); // read the next character.
      response += c;
    }
  }

  if (debug)
  {
    Serial.print(response);
  }

  return response;
}

