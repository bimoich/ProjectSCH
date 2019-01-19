#include <SoftwareSerial.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <ArduinoJson.h>
#include <Wire.h>

int statuss = 0;
int out = 0;
const char* ssid = "Area_24";
const char* password = "12qwerty34";
String id;
MFRC522 mfrc522(D4, D3);   // Create MFRC522 instance.

void setup() {
  SPI.begin();
  Wire.begin(D1, D2); /* join i2c bus with SDA=D1 and SCL=D2 of NodeMCU */
mfrc522.PCD_Init();   // Initiate MFRC522
Serial.begin(9600);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting...");
  }
  
}

void loop() {
  // Check WiFi Status    
    if ( ! mfrc522.PICC_IsNewCardPresent()) 
    {
    return;
    }
    // Select one of the cards
    if ( ! mfrc522.PICC_ReadCardSerial()) 
    {
      return;
    }
    //Show UID on serial monitor
    Serial.println();
    Serial.print(" UID tag :");
    String content= "";
    byte letter;
    for (byte i = 0; i < mfrc522.uid.size; i++) 
    {
       content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
       content.concat(String(mfrc522.uid.uidByte[i], HEX));
    }
    content.toUpperCase();

    id = content.substring(1);
    id.replace(" ","");
    Serial.println(id);

    
    if (WiFi.status() == WL_CONNECTED) {
    if (id != ""){
    HTTPClient http;  //Object of class HTTPClient
    String url = "http://192.168.137.22/php/rfid-read.php?rfid="+id+"";
    Serial.println(url);
    http.begin(url);
    int httpCode = http.GET();
    //Check the returning code                                                                  
    if (httpCode > 0) {
      Serial.println("Konek Cuy");
      const size_t bufferSize = JSON_OBJECT_SIZE(1);
      DynamicJsonBuffer jsonBuffer(bufferSize);
      JsonObject& root = jsonBuffer.parseObject(http.getString());
      // Parameters
      String Status = root["sts"]; 
      String sepeda =  root["id_sepeda"];
      Serial.println(Status);

    }
    http.end();
    id="";
    }//Close connection
  }
  delay(3000);
  
}
