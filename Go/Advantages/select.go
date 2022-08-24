package advantages

import "fmt"

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

func Select() {
	c, stop := make(chan int), make(chan int)
	go func() {
		for i := 0; i < 3; i++ {
			fmt.Println(<-c)
		}
		stop <- 0
	}()
	selectSyntax(c, stop)
}
