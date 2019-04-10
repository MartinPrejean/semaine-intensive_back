class Map {
    constructor(_element, _long, _lat) {
        this.element = _element

        this.width = this.element.offsetWidth
        this.height = this.element.offsetHeight

        this.projection = d3.geoNaturalEarth1() //Changer projection de la map
            .center([0, 0])
            .scale(this.width / this.height * 80) // Modifier taille map
            .translate([this.width / 2, this.height / 1.75]) //mofifier position
        this.path = d3.geoPath()
            .projection(this.projection)

            this.svg = d3.select('.container').append("svg")
            .attr("id", "svg")
            .attr("width", this.width)
            .attr("height", this.height)

        this.locations = this.svg.append("svg:g")
            .attr("class", "locations")

        this.deps = this.svg.append("g")
        this.circle
        this.initMap()
        this.resizeMap()
        this.popDot("#FF0000", _lat, _long)
    }

    initMap() {        
        d3.json('./custom.geo.json').then((_geojson) => {
            this.deps.selectAll("path")
                .data(_geojson.features)
                .enter()
                .append("path")
                .attr("class", "path_fill")
                .attr("d", this.path)
        })
    }

    popDot(_color, _long, _lat) { //Bien envoyer un objet avc latitude et longitude pour projection
        this.locations.selectAll('circle').remove()        
        this.circle = this.locations
            .append("circle", )
            .attr("r", 5)
            .style('fill', _color)
            .attr("transform", () => {
                return "translate(" + this.projection([
                    _long, // longitude
                    _lat,
                ]) + ")"
            })
            .attr('class', 'ripple-effect')
    }

    resizeMap() {
        const resize = () => {
            this.width = this.element.offsetWidth
            this.height = this.element.offsetHeight

            this.projection
                .center([0, 0])
                .scale([this.width / this.height * 80])
                .translate([this.width / 2, this.height / 1.75])

            d3.select("articles").attr("width", this.width).attr("height", this.height)
            d3.select("svg").attr("width", this.width).attr("height", this.height)

            d3.selectAll("path").attr('d', this.path)
        }

        window.addEventListener('resize', resize)
    }
}
const container = document.querySelector('.container')
// console.log(container);
console.log(longitudeISS);
let map = new Map(container,latitudeISS,longitudeISS);



// setTimeout(map.popDot, 5000);