import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GanadoresPremioPulitzerComponent } from './ganadores-premio-pulitzer.component';

describe('GanadoresPremioPulitzerComponent', () => {
  let component: GanadoresPremioPulitzerComponent;
  let fixture: ComponentFixture<GanadoresPremioPulitzerComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GanadoresPremioPulitzerComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GanadoresPremioPulitzerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
