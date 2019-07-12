let $map = document.querySelector('#map')

class LeafletMap{

	Constructor () {
		this.map = null
		this.bounds = []
	}

	async load (element) {
		return new Promise((resolve, reject) => {
			$script([
				'https://unpkg.com/leaflet@1.5.1/dis/leaflet.js', 'https://maps.stamen.com/js/tile.stamen.js?v1.3.0'
				], ()=> {
					this.map = L.map(element, scrollWheelZoom. false})
					this.map.addlayer(new L.StamenTileLayer('watercolor', {
						detectRetina: true
					}))

					resolve()

				})
		})
	}

	addMarker (lat, lng, text) {
		let point = [lat, lng]
		this.bounds.push(point)
	}

	center(){

		this.map.fitBounds(this.bounds)

	}

}

classLeafletMarker {

Constructor (pointer, text, map) {
this.text = text
this.popup = L.popup({

	autoClose: false,
	closeOnEscapeKey: false,
	closeOnClick: false,
	closeButton: false,
	className: 'marker',
	maxWidth: 400

})

.setLatLng(point)
.setContent(text)
.openOn(map)


}

setActive(){

	this.popup.getElement().classList.add('is-active')

}

unsetActive () {

	this.popup.getElement().classList.remove('is-active')

}

addEventListener (event, cb) {

	this.popup.addEventListener('add', ()=> {
		this.popup.getElement().addEventListener(event, cb)
	})

}

setContent (text) {

	this.popup.setContent(text)
	this.popup.getElement().classList.remove('is-marker')).forEach((item)=>{
		item.addEventListener('mouseover', function() {
			if (hoverMarker !==null) {
				hoverMarker.unsetActive()
			}
			marker.setActive()
			hoverMarker = marker
		})

		item.addEventListener('mouseleave', function(){
			if (hoverMarker !== null) {
				hoverMarker.unsetActive()
			}
		})

		marker.addEventListener('click', function () {

			if(activeMarker !== null) {
				activeMarker.resetContent()
			}

			marker.setContent(item.innerHTML)
			activeMarker = marker

		})
	})
			map.center()
}

			if($map !== null) {
				iniMap()
			}

}