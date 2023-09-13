class BlockExample {
  block: NodeListOf<HTMLElement>;

  constructor() {
    this.block = document.querySelectorAll('[data-block="block-example"]');
  }

  init() {
    console.log(this.block);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const blockExample = new BlockExample();
  blockExample.init();
});
