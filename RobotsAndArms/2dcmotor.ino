void setup()
{
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(8, OUTPUT);
  pinMode(9, OUTPUT);
  
}

void loop()
{
  digitalWrite(3, 1);
  digitalWrite(4, 0);
  digitalWrite(8, 1);
  digitalWrite(9, 0);
  delay(3000); 
  digitalWrite(3, 0);
  digitalWrite(4, 1);
  digitalWrite(8, 0);
  digitalWrite(9, 1);
  delay(3000);
}