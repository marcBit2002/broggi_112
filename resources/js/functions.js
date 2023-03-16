export function playAnimation(
    animation,
    delayBetween,
    items,
    startOpacity,
    endOpacity
) {
    // /(\d+)ms/ -> Busca numeros + 'ms'. [1] contiene el numero sin 'ms'
    const duration = animation.match(/(\d+)ms/)[1];

    for (let i = 0; i < items.length; i++) {
        const item = items[i];

        item.style.opacity = startOpacity;

        setTimeout(() => {
            item.style.animation = animation;

            setTimeout(() => {
                item.style.opacity = endOpacity;
                item.style.animation = "";
            }, duration);
        }, delayBetween * i);
    }
}
