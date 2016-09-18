using UnityEngine;
using System.Collections;
using UnityEngine.Audio;
using UnityEngine.UI;
using UnityEngine.SceneManagement;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

public class ZoomToPH : MonoBehaviour {

	// Use this for initialization
	public Button toNextScene;

	public void nextQuestion()
	{
		SceneManager.LoadScene("PH Scene");
	}
	void Start () {
	
	}
	

	// Update is called once per frame
	void Update () {
	
	}
}
