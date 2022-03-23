import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'lezione2';
  nuovotitolo:string = "Bicicletta";

  contatori:string[] = [];

  colore:string = "red";

  aggiungiContatore(nome:string) : void {
    this.contatori.push(nome);
    console.log(this.contatori);
  }

  rimuoviContatore(mess:string) : void {
    let index = this.contatori.indexOf(mess);
    this.contatori.splice(index, 1);
  }
}
