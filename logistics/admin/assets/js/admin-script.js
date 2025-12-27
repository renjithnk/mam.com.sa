// Sidetoggle Start

// Slidetoggle Full Function: Start

// slidedown method starts     
document.getElementById('copyright_year').innerHTML=(new Date().getFullYear());
let slideDown =  (elem) => {
    let computedDisplay = window.getComputedStyle(elem).display;

    if (computedDisplay === 'none') {
        computedDisplay = 'block';
    }

    elem.style.display = computedDisplay;

    let contentHeight = elem.offsetHeight;
    elem.style.overflow = 'hidden';
    elem.style.height = 0;
    elem.style.paddingTop = 0;
    elem.style.paddingBottom = 0;
    elem.style.marginTop = 0;
    elem.style.marginBottom = 0;
    elem.offsetHeight;
    elem.style.boxSizing = 'border-box';
    elem.style.transitionProperty = "all";
    let speed = 500;
    elem.style.transitionDuration = speed +'ms';
    elem.style.height = contentHeight + 'px';
    elem.style.removeProperty('padding-top');
    elem.style.removeProperty('padding-bottom');
    elem.style.removeProperty('margin-top');
    elem.style.removeProperty('margin-bottom');
    window.setTimeout( () => {
    elem.style.removeProperty('height');
    elem.style.removeProperty('overflow');
    elem.style.removeProperty('transition-duration');
    elem.style.removeProperty('transition-property');
    }, speed);
   }

  // slideup method starts 
  let slideUp = (elem) => {
    let computedDisplay = window.getComputedStyle(elem).display;

    if (computedDisplay === 'block') {
        computedDisplay = 'none';
    }

    elem.style.transitionProperty = "all";
    let speed = 500;
    elem.style.transitionDuration = speed +'ms';
    elem.style.boxSizing = 'border-box';
    elem.style.height = elem.offsetHeight + 'px';
    elem.offsetHeight;
    elem.style.overflow = 'hidden';
    elem.style.height = 0;
    elem.style.paddingTop = 0;
    elem.style.paddingBottom = 0;
    elem.style.marginTop = 0;
    elem.style.marginBottom = 0;
    window.setTimeout(()=>{
    elem.style.display="none";
    elem.style.removeProperty('height');
    elem.style.removeProperty('padding-top');
    elem.style.removeProperty('padding-bottom');
    elem.style.removeProperty('margin-top');
    elem.style.removeProperty('margin-bottom');
    elem.style.removeProperty('overflow');
    elem.style.removeProperty('transition-duration');
    elem.style.removeProperty('transition-property');
    },speed)
    };

         // slidetoggle method starts 
            let slideToggle = (elem)=>{
                let computedDisplay = window.getComputedStyle(elem).display;
            if(computedDisplay==="none") {
                slideDown(elem);
            }
            else {
                slideUp(elem);
            }
            };
			

// Slidetoggle Full Function: End

// Sidetoggle End

// Admin Sidebar Navigation: Start

let adminSidebarTrigger=document.querySelector('.admin-sidebar__trigger');
let adminSidebar=document.querySelector('.admin-sidebar');

adminSidebarTrigger.addEventListener("click",()=>{
 adminSidebar.classList.toggle('admin-sidebar--active')
})

let submenuTrigger=document.querySelector('.admin-header__navigation-trigger');
let submenuContent=document.querySelector('.admin-header__navigation-content');
submenuTrigger.addEventListener("click",()=>{
  submenuContent.classList.toggle('admin-header__navigation-content--show')
})

// Admin Sidebar Navigation: End

// Tabs: Start

window.addEventListener("load", function() {
	// store tabs variable
	var myTabs = document.querySelectorAll("ul.tabs__nav > li");
  function myTabClicks(tabClickEvent) {
		for (var i = 0; i < myTabs.length; i++) {
			myTabs[i].classList.remove("active");
		}	
		var clickedTab = tabClickEvent.currentTarget;
		clickedTab.classList.add("active");
		tabClickEvent.preventDefault();
		var myContentPanes = document.querySelectorAll(".tabs__pane");
		for (i = 0; i < myContentPanes.length; i++) {
			myContentPanes[i].classList.remove("active");
		}
		var anchorReference = tabClickEvent.target;
		var activePaneId = anchorReference.getAttribute("href");
		var activePane = document.querySelector(activePaneId);
		activePane.classList.add("active");
	}
	for (i = 0; i < myTabs.length; i++) {
		myTabs[i].addEventListener("click", myTabClicks)
	}
});


// Tabs: End


// Accordion Start

class Accordion {
    constructor({
        accordionTriggers: accordionTriggers,
        accordionContents: accordionContents,
        firstPanelOpen: condition,
    }) {
        
        this.accordionTriggers=document.querySelectorAll(accordionTriggers);
        this.accordionContents=document.querySelectorAll(accordionContents);
        this.childrenClass = accordionContents;
        this.accordionToggle = () => {
            let firstPanelOpen = condition;

            if(condition) {
                this.firstOne = this.accordionContents[0];
                this.firstOne.style.display="none";
                // console.log(this.firstOne);
            }
            
            this.accordionTriggers.forEach((elem) => {
                elem.addEventListener("click", (e) => {
                    let accordionContents = e.target.nextElementSibling;
                    let accordionContentsCS = window.getComputedStyle(accordionContents).display;
                    if (accordionContentsCS === "none") {
                        // Collapse function: Start
                        let parentUl = e.target.parentElement.parentElement;
                        let otherContents = parentUl.querySelectorAll(this.childrenClass);
                        console.log(otherContents);
                        otherContents.forEach((elem) => {
                            let elemCS = window.getComputedStyle(elem).display;
                            if(elemCS==="block") {
                                slideUp(elem);
                            }
                           
                        })
                        // Collapse function: End
                        slideDown(accordionContents);
                        // accordionContents.style.border="2px solid red";
                    }
                    else {
                        slideUp(accordionContents);
                    }
                })
            });
        };
    }
}


let accordionOne = new Accordion({
    accordionTriggers:".accordion-trigger",
    accordionContents: ".accordion-content",
    firstPanelOpen: true,
})

accordionOne.accordionToggle();

// Accordion End