import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CasellaTestoComponent } from './casella-testo/casella-testo.component';
import { CasellaTestoDueComponent } from './casella-testo-due/casella-testo-due.component';

@NgModule({
  declarations: [
    AppComponent,
    CasellaTestoComponent,
    CasellaTestoDueComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
