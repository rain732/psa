function Startup(){
    Title.textContent = 'Home';
    HomeAnchor.style.background = 'linear-gradient(90deg, rgba(0,206,255,1) 0%, rgba(0,255,255,1) 100%)';
    HomeAnchor.style.color = '#fff';
    ProductsAnchor.style.background = '#fff';
    ProductsAnchor.style.color = '#000';
    AboutAnchor.style.background = '#fff';
    AboutAnchor.style.color = '#000';
}
function Enter(section){
    if(section!=Active){
        ColorBackground(section);
        Active = section;
    };
};
function ColorBackground(Section){
    if (Section=='Home'){
        Title.textContent = 'Home';
        HomeAnchor.style.background = 'linear-gradient(90deg, rgba(0,206,255,1) 0%, rgba(0,255,255,1) 100%)';
        HomeAnchor.style.color = '#fff';
        ProductsAnchor.style.background = '#fff';
        ProductsAnchor.style.color = '#000';
        AboutAnchor.style.background = '#fff';
        AboutAnchor.style.color = '#000';
    } else if (Section=='Products'){
        Title.textContent = 'Products';
        ProductsAnchor.style.background = 'linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,136,0,1) 100%)';
        ProductsAnchor.style.color = '#fff';
        HomeAnchor.style.background = '#fff';
        AboutAnchor.style.background = '#fff';
        HomeAnchor.style.color = '#000';
        AboutAnchor.style.color = '#000';
    } else if (Section=='About'){
        Title.textContent = 'About';
        AboutAnchor.style.background = 'linear-gradient(90deg, rgba(0,255,25,1) 0%, rgba(245,255,0,1) 100%)';
        AboutAnchor.style.color = '#fff';
        HomeAnchor.style.background = '#fff';
        ProductsAnchor.style.background = '#fff';
        HomeAnchor.style.color = '#000';
        ProductsAnchor.style.color = '#000';
    };
};
// Declaring Important Variables
var Active = 'Home';
// Selecting Title
var Title = document.querySelector('#Title');
// Selecting Anchor Tags
var Anchors = document.querySelectorAll('a');
Anchors = Array.from(Anchors);
var HomeAnchor = Anchors[0];
var ProductsAnchor = Anchors[1];
var AboutAnchor = Anchors[2];
// Selecting Sections
var Sections = document.querySelectorAll('.sect');
Sections = Array.from(Sections);
Sections.forEach((item)=>{
    item.addEventListener('mouseenter',function(){
        Enter(item.id);
    });
});
Startup();




