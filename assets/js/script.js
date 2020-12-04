function togggleBoolAttr(el, attr) {
  return attr == "true" ? "false" : "true";
}

function togggleHiddenAttr(el, attr) {
  if (attr === true || attr === "hidden") return false;
  return true;
}

jQuery(document).ready(function ($) {
  // Homepage slider
  var sliderClass = ".testimonials-slider";
  if ($(sliderClass).length > 0) {
    new Glide(sliderClass).mount({ autoplay: true });
  }

  // Accordions
  // accordionHeader.click(() => accordionBody where labelledby = accordionHeader.id remove hide)
  $(".accordion-header").click(function (event) {
    var $el = $(event.currentTarget);
    var bodyId = $el.attr("aria-controls");
    var $accBody = $('[id="' + bodyId + '"]');

    // flip aria expanded
    $el.attr("aria-expanded", togggleBoolAttr);
    $accBody.attr("hidden", togggleHiddenAttr);
  });

  // FAQ Page
  if ($(".page-template-template-faq").length > 0) {
    var lock = false;
    var $faqLinks = $('[href^="#"]');

    // Set the active link from the url hash
    function setActiveFromHash() {
      var $activeFAQLink = $('.faq-sidebar a[href="' + window.location.hash + '"]');

      if ($activeFAQLink.length > 0) {
        $faqLinks.removeClass("active");
        $activeFAQLink.addClass("active");
      }
    }

    setActiveFromHash();

    // When the hash is updated, add the active class to the sidebar items
    $(window).on("hashchange", function (event) {
      event.preventDefault();
      setActiveFromHash();
    });

    TableOfContents.init();
  }
});

/**
 * Object to set the links active when headings are scrolled by.
 * @todo: Move to own file.
 */
var TableOfContents = {
  container: document.body,
  links: null,
  headings: null,
  intersectionOptions: {
    rootMargin: "0px",
    threshold: 1,
  },
  previousSection: null,
  observer: null,
  activeClass: "active",

  init: function () {
    this.handleObserver = this.handleObserver.bind(this);

    this.setUpObserver();
    this.findLinksAndHeadings();
    this.observeSections();
  },

  handleLinkClick: function (evt) {
    evt.preventDefault();
    let id = evt.target.getAttribute("href").replace("#", "");

    let section = this.headings.find((heading) => {
      return heading.getAttribute("id") === id;
    });

    section.setAttribute("tabindex", -1);
    section.focus();

    window.scroll({
      behavior: "smooth",
      top: section.offsetTop - 15,
      block: "start",
    });

    if (this.container.classList.contains(this.activeClass)) {
      this.container.classList.remove(this.activeClass);
    }
  },

  handleObserver: function (entries, observer) {
    entries.forEach((entry) => {
      let href = `#${entry.target.getAttribute("id")}`,
        link = this.links.find((l) => l.getAttribute("href") === href);

      if (entry.isIntersecting && entry.intersectionRatio >= 1) {
        link.classList.add("is-visible");
        this.previousSection = entry.target.getAttribute("id");
      } else {
        link.classList.remove("is-visible");
      }

      this.highlightFirstActive();
    });
  },

  highlightFirstActive: function () {
    let firstVisibleLink = this.container.querySelector(".is-visible");

    this.links.forEach((link) => {
      link.classList.remove(this.activeClass);
    });

    if (firstVisibleLink) {
      firstVisibleLink.classList.add(this.activeClass);
    }

    if (!firstVisibleLink && this.previousSection) {
      this.container
        .querySelector(`a[href="#${this.previousSection}"]`)
        .classList.add(this.activeClass);
    }
  },

  observeSections: function () {
    this.headings.forEach((heading) => {
      this.observer.observe(heading);
    });
  },

  setUpObserver: function () {
    this.observer = new IntersectionObserver(this.handleObserver, this.intersectionOptions);
  },

  findLinksAndHeadings: function () {
    this.links = [...this.container.querySelectorAll(".faq-sidebar a")];
    this.headings = this.links.map((link) => {
      let id = link.getAttribute("href");
      return document.querySelector(id);
    });
  },
};
