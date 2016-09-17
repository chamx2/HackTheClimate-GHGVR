using UnityEngine;
using System.Collections;


public class MainScript : MonoBehaviour {

	// Use this for initialization
	void Start () {
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
	}
	
	// Update is called once per frame
	void Update () {
		//read incoming data.
		//sample data from arduino: "12,6,45,4,0.78,9.15,4.56"
		if(BtConnector.available())
		{
			string incomingData = BtConnector.readLine();
			string[] incomingDataSplit = incomingData.Split(',');
			float data1 = float.Parse(incomingDataSplit[0]); //data = 12.6
			float data2 = float.Parse(incomingDataSplit[1]);
			float data3 = float.Parse(incomingDataSplit[2]);
			float data4 = float.Parse(incomingDataSplit[3]);
			float data5 = float.Parse(incomingDataSplit[4]);
			BtConnector.sendChar('X'); // For snchronization


		}
	}

	void OnApplicationQuit()
	{
		BtConnector.close();
	}
}
