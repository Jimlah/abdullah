import './bootstrap';
import Alpine from 'alpinejs'

window.Alpine = Alpine;

window.document.addEventListener('alpine:init', () => {
    window.Alpine.directive('modal', (el, {value, modifiers, expression}, {Alpine, evaluateLater, cleanup, effect}) => {
        let event = () => {
        };
        let show = false;

        if (value === 'button')
        {
            if (!el._x_modalbutton) {
                el._x_modalbutton = () => {
                    show = !show
                }
            }
            event = el.addEventListener('click', () => {
                !el._x_modalbutton()
            })
        }

        if (value === 'body') {

        }

        let ev = evaluateLater(show);

        effect(()=>{
           ev((value)=>{
               console.log(value)
           })
        });

        cleanup(() => event());
    });
})

window.Alpine.start();
