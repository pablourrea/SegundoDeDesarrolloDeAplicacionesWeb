import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { PieComponent } from './pie/pie.component';
import { CabeceraComponent } from './cabecera/cabecera.component';
import { CuerpoComponent } from './cuerpo/cuerpo.component';
import { WildlifePhotographerOfTheYearComponent } from './wildlife-photographer-of-the-year/wildlife-photographer-of-the-year.component';
import { HomeComponent } from './home/home.component';
import { GanadoresPremioPulitzerComponent } from './ganadores-premio-pulitzer/ganadores-premio-pulitzer.component';

@NgModule({
  declarations: [
    AppComponent,
    PieComponent,
    CabeceraComponent,
    CuerpoComponent,
    WildlifePhotographerOfTheYearComponent,
    HomeComponent,
    GanadoresPremioPulitzerComponent,

  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
