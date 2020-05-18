import { Component } from '@angular/core';

@Component({
    selector : 'bs-home' ,
    template : `
        <div class="ui container">
            <h1>Wilkommen</h1>
            <p>Das ist KWM-Shopping gegen Corona. <br/>Wir wollen Sie beim einkaufen unterstützten und bringen Hilfesuchende und Einkäufer zusammen!</p>
            <a routerLink="../shoppinglists" class="ui red button">
                Übersicht ansehen
                <i class="right arrow icon"></i>
            </a>
        </div>
    ` ,
    styles : []
})
export class HomeComponent { }
