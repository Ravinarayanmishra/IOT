<?php 
echo '
#define trigPin '.$input_pins.'
#define echoPin '.$output_pins.'
#define led 11
#define led2 10

void setup() {
  Serial.begin (9600);
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  //pinMode(led, OUTPUT);
 // pinMode(led2, OUTPUT);
  Serial.print("starting....");
}

void loop() {
  long duration, distance;
  digitalWrite(trigPin, LOW);  // Added this line
  delayMicroseconds(2); // Added this line
  digitalWrite(trigPin, HIGH);
//  delayMicroseconds(1000); - Removed this line
  delayMicroseconds(10); // Added this line
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  duration = pulseIn(echoPin,HIGH);
 // long a=analogRead(echoPin);
  Serial.println("time: ");
  Serial.print(duration);
  distance = (duration/2) /29.1;
  Serial.println(distance);
  /*if (distance < 4) {  // This is where the LED On/Off happens
    digitalWrite(led,HIGH); // When the Red condition is met, the Green LED should turn off
  digitalWrite(led2,LOW);
}
  else {
    digitalWrite(led,LOW);
    digitalWrite(led2,HIGH);
  }*/
  if (distance >= 200 || distance <= 0){
    Serial.println("Out of range");
  }
  else {
    Serial.print(distance);
    Serial.println(" cm");
  }
  delay(500);                                                                                                 
}'; 
?>