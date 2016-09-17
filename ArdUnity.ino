#include <dht11.h>
int methaneGasSensor = A0;
int DHTSensor = A1;
int CarbonDioxide = 389; //static value
int NitrogenDioxide = 432; //static value
dht11 DHT;

void setup() {
  Serial.begin(9600);
  pinMode(methaneGasSensor,INPUT);
  pinMode(DHTSensor,INPUT);
}

void loop() {
 int methaneGasValue = analogRead(methaneGasSensor);
  Serial.print(DHT.humidity,1);
  Serial.print(",");
  Serial.print(DHT.temperature,1);
  Serial.print(",");
  Serial.print(methaneGasValue);
  Serial.print(",");
  Serial.print(CarbonDioxide);
  Serial.print(",");
  Serial.print(NitrogenDioxide);
  Serial.println();
  while(!Serial.available());
  while(Serial.available());
  char in = Serial.read();
}


