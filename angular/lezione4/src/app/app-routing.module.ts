import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {MioformComponent} from "./mioform/mioform.component";
import {FormcompletoComponent} from "./formcompleto/formcompleto.component";

const routes: Routes = [
  {path: '', component: MioformComponent},
  {path: 'formcompleto', component: FormcompletoComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}
