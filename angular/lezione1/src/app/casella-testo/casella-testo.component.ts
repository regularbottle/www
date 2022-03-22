import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-casella-testo',
  templateUrl: './casella-testo.component.html',
  styleUrls: ['./casella-testo.component.css']
})
export class CasellaTestoComponent implements OnInit {

  testo:string = "";
  qualita:string = "";
  risultato:number = 0;
  constructor() {
    this.testo += " Mamma";
    this.risultato=this.somma(1 ,2);
  }

  ngOnInit(): void {
  }

  aggiungiElemento(): void {
    this.qualita="Guarda come mi diverto";
  }
  somma(a:number, b:number) : number {
    return a+b;
  }
}
