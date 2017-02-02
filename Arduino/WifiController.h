/*
   Author: David Solà Solé (david.sola.sole@gmail.com)
   Year: 2017
*/

#ifndef WifiController_h
#define WifiController_h

#include <Arduino.h>

class WifiController
{
  public:
    WifiController();
    void initialize();
    void sendRequest(String data);  // send data to web server
    String getPathGet();
    String getHost();
    String getPort();
    String getSsid();
    String getPass();
  private:
    String sendData(String command, const int timeout, boolean debug);
    String _pathGet;
    String _host;
    String _port;
    String _ssid;
    String _pass;

};

#endif
