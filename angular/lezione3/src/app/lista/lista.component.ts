import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-lista',
  templateUrl: './lista.component.html',
  styleUrls: ['./lista.component.css']
})
export class ListaComponent implements OnInit {

  listaImpegni:string[] = [];

  constructor() { }

  ngOnInit(): void {
  }

  aggiungiImpegno(nome:string) : void {
    this.listaImpegni.push(nome);
  }

  catturaEvento(ind:number) : void {
    this.listaImpegni.splice(ind, 1);
  }
}
