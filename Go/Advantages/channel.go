package advantages

import (
	"fmt"
	"time"
)

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

func Channel() {

	c := make(chan int)

	go send(c)
	go receive(c)

	go send(c) //wait at "send 0 to c"
}

func BufferedChannel() {
	bc := make(chan int, 5) //just need to add size
	go send(bc)
	go receive(bc)

	go send(bc) //no wait
}
