package interfaces

import "fmt"

type Human interface {
	Speak() string
}

type Person struct {
	h Human
}

func (p *Person) Speak() string {
	return p.h.Speak()
}

type Geometry interface {
	Area() float64
}

type Rectangle struct {
	Width  float64
	Height float64
}

func (r *Rectangle) Area() float64 { //rectangle implement geometry interface
	return r.Width * r.Height
}

func Example() {
	var g Geometry
	r := Rectangle{Width: 10, Height: 5}
	g = &r
	fmt.Println(g.Area())
}
