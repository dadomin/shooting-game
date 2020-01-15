class Stage {
	constructor(gw,gh,imgs){

		this.stage1 = [
		{
			time : 1,
			data:{
				x:gw / 2-30,
				y: 0,
				w:60,
				h : 40,
				img: imgs.enemy,
				s:50,
				v: new Vector(0,1)
			}
		},
		{
			time : 1,
			data:{
				x:-30,
				y: 0,
				w:60,
				h : 40,
				img: imgs.enemy,
				s:50,
				v: new Vector(1,1).normalize()
			}
		},
		{
			time : 1,
			data:{
				x:gw,
				y: 0,
				w:60,
				h : 40,
				img: imgs.enemy,
				s:50,
				v: new Vector(-1,1).normalize()
			}
		}
		];
	}
}