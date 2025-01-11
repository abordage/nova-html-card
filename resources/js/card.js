import Card from './components/Card';
import RangedCard from './components/RangedCard';

Nova.booting(Vue => {
    Vue.component('abordage-html-card', Card);
    Vue.component('abordage-html-ranged-card', RangedCard);
});
