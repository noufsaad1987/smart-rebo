#include <Servo.h>

int position = 0;

Servo servo_0;

Servo servo_1;



void setup()
{
  servo_0.attach(3);

  servo_1.attach(5);

}

void loop()
{
  for (position = 0; position <= 180; position+=1) {
    servo_0.write(position);
    servo_1.write(180-position);
    delay(15); // Wait for 15000 millisecond(s)
  }
  for (position = 180; position >= 0; position-=1) {
    servo_0.write(position);
    servo_1.write(180-position);
    delay(15); // Wait for 15000 millisecond(s)
  }
}