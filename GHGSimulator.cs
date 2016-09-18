using UnityEngine;
using System;
using System.Collections;
using System.IO;
using System.Net.Sockets;
using System.Linq;
using System.Collections.Generic;
using System.IO.Ports;
using UnityEngine.UI;
public class GHGSimulator : MonoBehaviour {
	public SerialController serialController;
	public Text TempT;	
	public Text HumidT;
	public Text CarbonT;
	public Text MethaneT;
	public Text NitrousT;



		void Start () 
		{
			UnityEngine.UI.Text console3;
	    UnityEngine.UI.Text console2;	
		//Setup & initialize bluetooth connection
			if(!BtConnector.isBluetoothEnabled())
			{
				BtConnector.enableBluetooth();
			}	
			BtConnector.moduleName("HC-05");
			if(!BtConnector.isConnected())
			{
				BtConnector.connect();
			}


		   	     GameObject go2 = GameObject.Find("Text Console");
		        console2 = go2.GetComponent<UnityEngine.UI.Text>();
		        GameObject go3 = GameObject.Find("Text L");
		        console3 = go3.GetComponent<UnityEngine.UI.Text>();
		       


        }
        
	    UnityEngine.UI.Text sensor;
    	// void updateSensor1(){
    		


    	// // }
    	// // void updateUI(){
    	// // 	console3.text = "CO2";
    	// // 	console3.text +=":";
    	// // 	console3.text +="260\t";
    	// // 	console3.text +="N20";
    	// // 	console3.text +=":";
    	// // 	console3.text +="100";

    	// // }
     //    	}
    	// void processFrame()
    	// {
    	// 	// updateUI();
    	// 	updateSensor();
    		
    	// }
    	void OnApplicationQuit(){
    		BtConnector.close();
    	}
        void Update()
        {
        	//read incoming data.
        	//sample data 

        	if(BtConnector.available())
        	{
        		string incomingData = BtConnector.readLine();
        		string[] incomingDataSplit = incomingData.Split(',');
        		float data1 = float.Parse(incomingDataSplit[0]);
        		float data2 = float.Parse(incomingDataSplit[1]);
        		float data3 = float.Parse(incomingDataSplit[2]);
        		float data4 = float.Parse(incomingDataSplit[3]);
        		float data5 = float.Parse(incomingDataSplit[4]);
        		BtConnector.sendChar('X');//FOr sync

        		//Do whatever
        		GameObject sensorgo = GameObject.Find("SensorText");
     		   	sensor = sensorgo.GetComponent<UnityEngine.UI.Text>();
        		sensor.text = "Methane\t";
        		sensor.text +=":";
        		sensor.text +=data1;
        		sensor.text +="\n";
        		sensor.text +="Temperature\t";
        		sensor.text +=":";
        		sensor.text +=data2;
        		sensor.text +="\n";
        	}


        	  // processFrame();
        	
        	
        }

}
