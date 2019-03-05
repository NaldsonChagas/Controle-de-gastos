class PurchasesController {

  constructor() {
    this._form = document.querySelector('form');

    this._select = document.querySelector('#installment-payment');

    this._value = document.querySelector('#value');

    this.showSelectInstallmentPayment();
  }

  showSelectInstallmentPayment() {
    this.fillSelect();

    const checkBox = document.querySelector('#isInstallments');

    checkBox.addEventListener('change', (event) => {
      if (checkBox.checked) this._select.classList.remove('hidden');
      else this._select.classList.add('hidden');
    });
  }

  fillSelect() {

    this._value.addEventListener('input', () => {
      this._select.innerHTML = '';
      for (let i = 0; i < 12; i++) {
        const option = document.createElement('option');
        const installment = value.value/(i+1);
        option.text = `${i+1}x de ${installment.toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        })}`;
        option.value = installment;

        this._select.appendChild(option);
      }
    });
  }

}