import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { CabeceraComponent } from './cabecera/cabecera.component';
import { HomeComponent } from './home/home.component';
import { InstalacionesComponent } from './instalaciones/instalaciones.component';
import { SobrenosotrosComponent } from './sobrenosotros/sobrenosotros.component';
import { BodyComponent } from './body/body.component';
import { PieComponent } from './pie/pie.component';
import { APP_ROUTING } from './app.routes';

@NgModule({
  declarations: [
    AppComponent,
    CabeceraComponent,
    HomeComponent,
    InstalacionesComponent,
    SobrenosotrosComponent,
    BodyComponent,
    PieComponent
  ],
  imports: [
    BrowserModule,
    APP_ROUTING
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
