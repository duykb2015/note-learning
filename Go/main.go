package main

import (
	advantages "go-oop/Advantages"
	interfaces "go-oop/Interfaces"
	"time"
)

func main() {

	//==================================
	//interface
	interfaces.Example()

	//==================================

	//Goroutine
	advantages.Goroutine()

	//Channel
	advantages.Channel()

	//Buffered channel
	advantages.BufferedChannel()

	//Select
	advantages.Select()

	//Mutex
	advantages.Mutex()

	time.Sleep(1000 * time.Millisecond)
}
