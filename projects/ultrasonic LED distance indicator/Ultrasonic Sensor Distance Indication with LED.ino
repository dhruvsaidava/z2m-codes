#define trigPin 11
#define echoPin 12
#define RedLed 13
#define greenLed 3

void setup() {
  Serial.begin (9600);
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  pinMode(RedLed, OUTPUT);
  pinMode(greenLed, OUTPUT);
}

void loop() {
  long duration, distance;
  digitalWrite(trigPin, LOW); 
  delayMicroseconds(2); 
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10); 
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  distance = (duration/2) / 29.1;
  
  if (distance < 4) {  // This is where the RED LED On/Off happens
      digitalWrite(RedLed,HIGH); // When the Red condition is met, the Green LED should turn off
      digitalWrite(greenLed,LOW);
  }
  else {
         digitalWrite(RedLed,LOW);
         digitalWrite(greenLed,HIGH);
  }
  
   
  if (distance >= 200 || distance <= 0){
      Serial.println("Out of range");
  }
  else {
        Serial.print(distance);
        Serial.println(" cm");
  }
  delay(500);
}