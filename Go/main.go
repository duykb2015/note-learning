package main

import (
	"fmt"
	"sync"
	"time"
)

// type Human interface {
// 	Speak() string
// }

// type Person struct {
// 	h Human
// }

// func (p *Person) Speak() string {
// 	return p.h.Speak()
// }

// type Geometry interface {
// 	Area() float64
// }

// type Rectangle struct {
// 	Width  float64
// 	Height float64
// }

// func (r *Rectangle) Area() float64 {
// 	return r.Width * r.Height
// }

var count = 0
var mutex sync.Mutex

func say(who string, s string) {
	for i := 0; i < 3; i++ {
		time.Sleep(100 * time.Millisecond)
		fmt.Printf("%v say: %v\n", who, s)
	}
}

// func send(c chan <- int) mean channel write only
func send(c chan int) {
	for i := 0; i < 3; i++ {
		time.Sleep(10 * time.Millisecond)
		fmt.Printf("send %v to channel\n", i)
		c <- i //send i to c channel
	}
}

// func send(c <- chan int) mean channel read only
func receive(c chan int) {
	for i := 0; i < 3; i++ {
		time.Sleep(10 * time.Millisecond)
		s := <-c //receive channel
		fmt.Println(s)
	}
}

func selectSyntax(c, stop chan int) {
	x := 0
	for {
		select {
		case c <- x:
			x = x + 1
		case <-stop:
			fmt.Println("End")
			return
		}
	}
}

func counting(time int) {
	for i := 0; i < 5; i++ {
		count++
	}
	fmt.Printf("Count after i = %v, count: %v\n", time, count)
}
func countingMutex(time int) {
	for i := 0; i < 5; i++ {
		mutex.Lock() //Lock
		count++
		mutex.Unlock()
	}
	fmt.Printf("Count after i = %v, count: %v\n", time, count)
}

func main() {
	// var g Geometry
	// r := Rectangle{Width: 10, Height: 5}
	// g = &r
	// fmt.Println(g.Area())

	//Goroutine
	go say("Duy", "Yolo")
	say("Ohio", "Nuclear")

	//Channel
	c := make(chan int)

	go send(c)
	go receive(c)

	go send(c) //wait at "send 0 to c"

	//Buffered channel
	bc := make(chan int, 5) //just need to add size
	go send(bc)
	go receive(bc)

	go send(bc) //no wait

	//Select
	stop := make(chan int)
	go func() {
		for i := 0; i < 3; i++ {
			fmt.Println(<-c)
		}
		stop <- 0
	}()
	selectSyntax(c, stop)

	//Mutex
	for i := 0; i < 3; i++ {
		go counting(i)
	}

	for i := 0; i < 3; i++ {
		go countingMutex(i)
	}

	time.Sleep(1000 * time.Millisecond)
}
