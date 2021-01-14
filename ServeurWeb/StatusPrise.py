import paho.mqtt.client as mqtt #import the client1
import time

############

def on_message(client, userdata, message):
    time.sleep(1)
    print("received message =",str(message.payload.decode("utf-8")))
    if ( str(message.payload.decode("utf-8")) == 'ok' ):
      	prise1 = open("/var/www/php/YourFile",'r+')
      	prise1.truncate(0) # need '0' when using r+
      	prise1.write("ok")
      	prise1.close()
    if ( str(message.payload.decode("utf-8")) == 'not' ):
        prise1 = open("/var/www/php/YourFile",'r+')
	      prise1.truncate(0)
        prise1.write("not")
        prise1.close()

########################################


broker_address="Your Broker IP Address"
print("creating new instance")
client = mqtt.Client("P1_State_http") #Every client id need to be different
client.on_message=on_message #attach function to callback
print("connecting to broker")
client.connect(broker_address) #connect to broker
print("Subscribing to topic","YourTopic")
client.subscribe("YourTopic")


client.loop_start() #start the loop
client.loop_forever() #stop the loop
