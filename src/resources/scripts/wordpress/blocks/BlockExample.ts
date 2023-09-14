class BlockExample extends HTMLElement {
  block: HTMLElement;

  buttons: NodeListOf<HTMLElement>;

  constructor() {
    super();

    this.block = this;
    this.buttons = this.querySelectorAll('[data-js="button"]');

    this.initButton();
  }

  initButton() {
    if (this.buttons.length < 1) return;

    this.buttons.forEach((button) => {
      button.addEventListener('click', this.handleButton);
    });
  }

  handleButton() {
    console.log(this);
  }
}

customElements.define('block-example', BlockExample);
