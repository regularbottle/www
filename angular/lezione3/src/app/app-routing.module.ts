import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {ListaComponent} from './lista/lista.component';
import { CommentoComponent } from './commento/commento.component';

const routes: Routes = [
  {path: '', component: ListaComponent},
  {path: 'commento', component: CommentoComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}
