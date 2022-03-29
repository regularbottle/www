import {Component, Input, Output, EventEmitter, OnInit} from '@angular/core';

@Component({
  selector: 'app-lista-item',
  templateUrl: './lista-item.component.html',
  styleUrls: ['./lista-item.component.css']
})
export class ListaItemComponent implements OnInit {

  @Input() testo:string = "";
  @Input() indice:number = -1;

  @Output() cancellaImpegno = new EventEmitter<number>();

  constructor() { }

  ngOnInit(): void {
  }

  scaturisciEvento() : void {
    console.log("emetti evento")
    this.cancellaImpegno.emit(this.indice);
  }
}
